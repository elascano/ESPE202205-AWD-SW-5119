/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.record.model;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;

/**
 *
 * @author Sebastian
 */

public class ControllerDB {

    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;
    
    public  ControllerDB() {
        mongoURI = new MongoClientURI(
                "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test");
        client = new MongoClient(mongoURI);
        database = client.getDB("AWD5119");
        collection = database.getCollection("Vynil");
    }

    public String search(int idVynil) {
       
        String vynil_record = "";
        BasicDBObject search_data = new BasicDBObject();
        search_data.put("idVynil",idVynil);
        DBCursor cursor = collection.find(search_data);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            vynil_record += cursor.next();
            }
        }
        return vynil_record;
    }

        public String find(int idVynil) {
       
        String vynil_record = "";
        BasicDBObject find_data = new BasicDBObject();
        find_data.put("idVynil",idVynil);
        DBCursor cursor = collection.find();
        
           while(cursor.hasNext()){
            vynil_record += cursor.next();
            }
        
        return vynil_record;
    }
        
        public String read(){
        String vynil_record = "";
        DBCursor cursor = collection.find();
        while(cursor.hasNext()){
            vynil_record += cursor.next();
        }
        return vynil_record;
    }
}
