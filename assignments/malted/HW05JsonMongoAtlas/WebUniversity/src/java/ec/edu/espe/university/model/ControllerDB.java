/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.model;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;

/**
 *
 * @author marce
 */
public class ControllerDB {
    
    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;
    
    public  ControllerDB() {
        mongoURI = new MongoClientURI(
                "mongodb+srv://Dm2v:Espe2022@cluster0.wvysmrz.mongodb.net/?retryWrites=true&w=majority");
        client = new MongoClient(mongoURI);
        database = client.getDB("WebUniveristy");
        collection = database.getCollection("Instructor");
    }
    

     public void add() {
        BasicDBObject obj = new BasicDBObject();
        obj.append("id",1);
        obj.append("name", "Marcelo");
        obj.append("Salary",3000);
        obj.append("TC",true);
        
        collection.insert(obj);
    }

    public String search(int id) {
       
        String instructor = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("id",id);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            instructor += cursor.next();
            }
        }
        return instructor;
    }
    
}

