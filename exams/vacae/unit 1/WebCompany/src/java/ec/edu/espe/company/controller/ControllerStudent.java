/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.company.controller;
package ec.edu.company.model;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
/**
 *
 * @author ediso
 */
public class ControllerStudent {
    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;

    public ControllerStudent() {
        mongoURI = new MongoClientURI(
                "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority");
        client = new MongoClient(mongoURI);
        database = client.getDB("AWD5119");
        collection = database.getCollection("Students");
    }
    public String search(int idStudent) {
       
        String student = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idStudent",idStudent);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            student += cursor.next();
            }
        }
        return student;
    }
    public String read(){
        String students = "";
        DBCursor cursor = collection.find();
        while(cursor.hasNext()){
            students += cursor.next();
        }
        return students;
    }
    
}
