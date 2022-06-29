/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.controller;
import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;

import java.util.ArrayList;
import ec.edu.espe.model.Hardware;

/**
 *
 * @author HP PC
 */
public class ControllerDB {

    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;

    public ControllerDB() {
        mongoURI = new MongoClientURI(
                "mongodb://edison19:admin@ac-zvfenfd-shard-00-00.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-01.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-02.rbj5oin.mongodb.net:27017/?ssl=true&replicaSet=atlas-jretwc-shard-0&authSource=admin&retryWrites=true&w=majority");
        client = new MongoClient(mongoURI);
        database = client.getDB("hardwareStore");
        collection = database.getCollection("items");
    }

    /*public void add(Shoes shoes) {
        BasicDBObject obj = new BasicDBObject();
        obj.append("id",shoes.getId());
        obj.append("trademark",shoes.getTrademark());
        obj.append("size",shoes.getSize());
        obj.append("type",shoes.getType());
        obj.append("color",shoes.getColor());
        obj.append("price",shoes.getPrice());
        obj.append("description",shoes.getDescription());
                   
        collection.insert(obj);
    }*/
    
    public ArrayList<Hardware> readList() {
        ArrayList<Hardware> listHardware = new ArrayList();
        Gson gson = new Gson();
       
        String sHardware = "";
        DBCursor cursor = collection.find();
        
        while (cursor.hasNext()) {
            sHardware="";
            sHardware += cursor.next();
            Hardware hardware = gson.fromJson(sHardware, Hardware.class);
            listHardware.add(hardware);
        }
        return listHardware;
    }
    
    public String search(int id) {
        String sHardware = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idItem", id);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
            sHardware += cursor.next();
        } else {
            sHardware = "No existe";
            }
        return sHardware;
    }
    
}
