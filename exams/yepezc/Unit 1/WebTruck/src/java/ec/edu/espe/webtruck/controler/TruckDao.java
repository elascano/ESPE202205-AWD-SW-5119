/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.webtruck.controler;

import com.google.gson.Gson;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.webtruck.model.Truck;
import ec.edu.espe.webtruck.utils.MongoManager;
import java.util.ArrayList;
import java.util.List;
import org.bson.Document;

/**
 *
 * @author yepec
 */
public class TruckDao {
    public static List<Truck> getAllRecords(){
        Gson gson = new Gson();
        ArrayList<String> truckStringList = MongoManager.findAll();
        List<Truck> truckList = new ArrayList<>();
        Truck truck = new Truck();
        for(String stringTruck : truckStringList){
          truck = gson.fromJson(stringTruck,Truck.class);
          truckList.add(truck);
        }     
        return truckList;      
    }
    
    public static boolean save(Truck truck){
        Gson gson = new Gson();   
        MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test"); 
        String newTruck = gson.toJson(truck);
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase("AWD5119");
        MongoCollection collection = database.getCollection("Truck");
        Document truckRegistry = null;
        boolean saved = false;
        try{
            truckRegistry = Document.parse(newTruck);  
            saved = true;
        }
        catch(Exception e){
            saved = false;
        }
        collection.insertOne(truckRegistry);
        mongoClient.close();   
        return saved;
    }
}

