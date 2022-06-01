/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.computersystem.model.Computer;
import org.bson.Document;
import org.bson.types.ObjectId;


/**
 *
 * @author marce
 */
public class DBMongoManager {
    
    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;
    
    public  DBMongoManager() {
        mongoURI = new MongoClientURI(
                "mongodb+srv://edison19:admin@cluster0.wvysmrz.mongodb.net/?retryWrites=true&w=majority");
        //mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test
        client = new MongoClient(mongoURI);
        database = client.getDB("MalteComputers");
        collection = database.getCollection("Computers");

    }
    
    public String search(int id) {
       
        String computer = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("id",id);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            computer += cursor.next();
            }
        }
        return computer;
    }
    

     public void add() {
        BasicDBObject obj = new BasicDBObject();
        obj.append("id",1);
        obj.append("name", "Marcelo");
        obj.append("model","HP");
        obj.append("price","2000");
        obj.append("color","Negro");
        obj.append("processor","Intel i5");
        obj.append("size","14'");
        obj.append("condition","Disponible");
        
        collection.insert(obj);
    }


    
    //Insert Computer
    public void create(Computer computer){
        BasicDBObject obj = new BasicDBObject();
        
            obj.append("id", computer.getId());
            obj.append("name", computer.getName());
            obj.append("model", computer.getModel());
            obj.append("price", computer.getPrice());
            obj.append("color", computer.getColor());
            obj.append("processor", computer.getProcessor());
            obj.append("size", computer.getSize());
            obj.append("condition", computer.getCondition());
            collection.insert(obj);
    }

}
