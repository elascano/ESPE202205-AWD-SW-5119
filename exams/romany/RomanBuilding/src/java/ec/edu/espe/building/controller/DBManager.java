/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.building.controller;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.building.model.Building;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author yulia
 */
public class DBManager {

    MongoDatabase baseDatos;
    //DBCollection collection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;

    Gson gson = new Gson();

    public DBManager(String nameCollection) {
        try {
            this.nameCollection = nameCollection;
            String data;
            data = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";

            MongoClientURI uri;
            uri = new MongoClientURI(data);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase("AWD5119");
            collection = baseDatos.getCollection(nameCollection);
            System.out.println("Conection to database sucessfully");

        } catch (Exception e) {
            System.out.println("Cannnot conect with database");

        }

    }

    public void insert(Building instructor) {
        Document doc = new Document();
        doc.append("id", instructor.getId());
        doc.append("floorNumber", instructor.getFloorNumber());
        doc.append("owner", instructor.getOwner());
        doc.append("color", instructor.getColor());
        doc.append("height", instructor.getHeight());
        doc.append("price", instructor.getPrice());
        doc.append("material", instructor.getMaterial());
        doc.append("address", instructor.getAddress());
        collection.insertOne(doc);
        mongo.close();
    }

    public Building retrieve(int idBuilding) {
        Building building;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int id;
        int floorNumber;
        String owner;
        String color;
        String address;
        String material;
        float height;
        float price;
        Building buildingRetrieved = new Building();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = Integer.parseInt(gson.toJson(theObj.get("id")));
            floorNumber=Integer.parseInt(gson.toJson(theObj.get("floorNumber")));
            owner = gson.toJson(theObj.get("owner")).replace("\"", "");
            material=gson.toJson(theObj.get("material")).replace("\"", "");            
            address=gson.toJson(theObj.get("address")).replace("\"", "");            
            color=gson.toJson(theObj.get("color")).replace("\"", "");
            height = Float.parseFloat(gson.toJson(theObj.get("height")));
            price = Float.parseFloat(gson.toJson(theObj.get("price")));
            building= new Building(id, floorNumber, owner, color, address, material, height, price);
            if (idBuilding == id) {
                buildingRetrieved = building;
            }
        }
        return buildingRetrieved;
    }
     public ArrayList<Building> retrieveBuildings() {
        ArrayList<Building> buildings = new ArrayList<>();
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int id;
        int floorNumber;
        String owner;
        String color;
        String address;
        String material;
        float height;
        float price;
        Building building;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = Integer.parseInt(gson.toJson(theObj.get("id")));
            floorNumber=Integer.parseInt(gson.toJson(theObj.get("floorNumber")));
            owner = gson.toJson(theObj.get("owner")).replace("\"", "");
            material=gson.toJson(theObj.get("material")).replace("\"", "");            
            address=gson.toJson(theObj.get("address")).replace("\"", "");            
            color=gson.toJson(theObj.get("color")).replace("\"", "");
            height = Float.parseFloat(gson.toJson(theObj.get("height")));
            price = Float.parseFloat(gson.toJson(theObj.get("price")));
            building= new Building(id, floorNumber, owner, color, address, material, height, price);
            buildings.add(building);
        }
        return buildings;
     }
}
