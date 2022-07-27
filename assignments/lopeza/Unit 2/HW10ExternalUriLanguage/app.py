from fastapi import FastAPI
from routes.vehicle import vehicle

app = FastAPI()

app.include_router(vehicle)