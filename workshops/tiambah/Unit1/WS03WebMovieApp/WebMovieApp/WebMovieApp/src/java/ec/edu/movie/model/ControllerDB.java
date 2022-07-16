/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.movie.model;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;

/**
 *
 * @author HP PC
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
        collection = database.getCollection("Movie");
    }

    public String search(int idMovie) {
       
        String movie = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idMovie",idMovie);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            movie += cursor.next();
            }
        }
        return movie;
    }

        public String find(int idMovie) {
       
        String movie = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idMovie",idMovie);
        DBCursor cursor = collection.find();
        
           while(cursor.hasNext()){
            movie += cursor.next();
            }
        
        return movie;
    }
        
        public String read(){
        String movie = "";
        DBCursor cursor = collection.find();
        while(cursor.hasNext()){
            movie += cursor.next();
        }
        return movie;
    }


}
