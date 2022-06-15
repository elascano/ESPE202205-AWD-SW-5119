from fastapi import APIRouter, Response
from config.db import conn
from schemas.vehicle import vehicleEntity, vehiclesEntity
from models.vehicle import Vehicle
from bson import ObjectId
from starlette.status import HTTP_204_NO_CONTENT

vehicle = APIRouter()

@vehicle.get('/vehicles', response_model=list[Vehicle])
def getAllVehicles():
    return vehiclesEntity(conn.Assignments.Vehicles.find())

@vehicle.post('/vehicles')
def createVehicle(vehicle: Vehicle):
    newVehicle = dict(vehicle)

    del newVehicle["id"]
    id = conn.Assignments.Vehicles.insert_one(newVehicle).inserted_id
    vehicle = conn.Assignments.Vehicles.find_one({"_id": id})
    return vehicleEntity(vehicle)

@vehicle.get('/vehicles/{id}')
def getVehicle(id: str):
    return vehicleEntity(conn.Assignments.Vehicles.find_one({"_id": ObjectId(id)}))

@vehicle.put('/vehicles/{id}')
def updateVehicle(id: str, vehicle: Vehicle):
    conn.Assignments.Vehicles.find_one_and_update({"_id": ObjectId(id)}, {"$set": dict(vehicle)})
    return vehicleEntity(conn.Assignments.Vehicles.find_one({"_id": ObjectId(id)}))

@vehicle.delete('/vehicles/{id}')
def deleteVehicle(id: str):
    conn.Assignments.Vehicles.find_one_and_delete({"_id": ObjectId(id)})
    return Response(status_code=HTTP_204_NO_CONTENT)