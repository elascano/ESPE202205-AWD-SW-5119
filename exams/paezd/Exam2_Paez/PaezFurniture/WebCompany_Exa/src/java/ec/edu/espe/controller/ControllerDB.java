/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.edu.espe.controller;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author kevin
 */
public class ControllerDB {

   private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;
    
    public  ControllerDB() {
        mongoURI = new MongoClientURI(
                "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority");
        client = new MongoClient(mongoURI);
        database = client.getDB("AWD5119");
        collection = database.getCollection("Furniture");
    }

    public String search(int idFurniture) {
       
        String furniture = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idFurniture",idFurniture);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            furniture += cursor.next();
            }
        }
        return furniture;
    }

        public String find(int idFurniture) {
       
        String furniture = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idFurniture",idFurniture);
        DBCursor cursor = collection.find();
        
           while(cursor.hasNext()){
            furniture += cursor.next();
            }
        
        return furniture;
    }
        
        public String read(){
        String furniture = "";
        DBCursor cursor = collection.find();
        while(cursor.hasNext()){
            furniture += cursor.next();
        }
        return furniture;
    }
   
}
