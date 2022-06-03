/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.ControllerDB;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;

/**
 *
 * @author Henry
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
        collection = database.getCollection("Banks");
    }

    public String search(int idBanks) {
       
        String banks = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idBanks",idBanks);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            banks += cursor.next();
            }
        }
        return banks;
    }

        public String find(int idBanks) {
       
        String banks = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idBanks",idBanks);
        DBCursor cursor = collection.find();
        
           while(cursor.hasNext()){
            banks += cursor.next();
            }
        
        return banks;
    }
        
        public String read(){
        String banks = "";
        DBCursor cursor = collection.find();
        while(cursor.hasNext()){
            banks += cursor.next();
        }
        return banks;
    }
    
}
