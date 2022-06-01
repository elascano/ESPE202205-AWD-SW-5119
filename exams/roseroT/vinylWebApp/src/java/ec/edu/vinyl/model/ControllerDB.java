/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.vinyl.model;

/**
 *
 * @author usuario
 */
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
/**
 *
 * @author usuario
 */
public class ControllerDB {
    
    private MongoClientURI mongoURI;
    private MongoClient client;
    private DB database;
    private DBCollection collection;
    
    public  ControllerDB() {
        String conexion = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";
        String db = "AWD5119";
        String coleccion = "VinylRecords";
        
        mongoURI = new MongoClientURI(
                conexion
        );
        client = new MongoClient(mongoURI);
        database = client.getDB(db);
        collection = database.getCollection(coleccion);
    }

    public String search(int id) {
       
        String vinyl = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("idVinyl",id);
        DBCursor cursor = collection.find(busqueda);
        if (cursor.hasNext()) {
           while(cursor.hasNext()){
            vinyl += cursor.next();
            }
        }
        return vinyl;
    }

        public String find(int idVinyl) {
       
        String vinyl = "";
        BasicDBObject busqueda = new BasicDBObject();
        busqueda.put("id",idVinyl);
        DBCursor cursor = collection.find();
        
           while(cursor.hasNext()){
            vinyl += cursor.next();
            }
        
        return vinyl;
    }
        
        public String read(){
        String vinyl = "";
        DBCursor cursor = collection.find();
        while(cursor.hasNext()){
            vinyl += cursor.next();
        }
        return vinyl;
    }
    
    
}
