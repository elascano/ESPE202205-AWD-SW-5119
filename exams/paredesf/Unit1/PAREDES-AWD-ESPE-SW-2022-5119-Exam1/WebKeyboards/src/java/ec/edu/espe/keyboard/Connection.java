/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.keyboard;

/**
 *
 * @author Fernando Paredes
 */

import com.mongodb.BasicDBList;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.Mongo;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import java.util.ArrayList;
import java.util.List;
import org.bson.Document;

    
public class Connection {
    MongoDatabase dataBase; 
    MongoClient mongoClient;
    String cluster;
    String nameCollection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    Gson gson = new Gson();


    public Connection(String nameCollection) {
        try {
            this.nameCollection = nameCollection;
            cluster = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";
            MongoClientURI uri;
            uri = new MongoClientURI(cluster);
            mongoClient =  new MongoClient(uri);
            dataBase = mongoClient.getDatabase("AWD5119");
            
            //collection = database.getCollection("instructor");
            collection = dataBase.getCollection(nameCollection);
            System.out.println("Conection to database sucessfully");
        } catch (Exception e) {
            System.out.println("Data base fail");
        }
    }

    public MongoDatabase getDataBase() {
        return dataBase;
    }

    public void setDataBase(MongoDatabase dataBase) {
        this.dataBase = dataBase;
    }
    
    public String getCluster() {
        return cluster;
    }

    public void setCluster(String cluster) {
        this.cluster = cluster;
    }

    public String getNameCollection() {
        return nameCollection;
    }

    public void setNameCollection(String nameCollection) {
        this.nameCollection = nameCollection;
    }

    public MongoCollection<Document> getCollection() {
        return collection;
    }

    public void setCollection(MongoCollection<Document> collection) {
        this.collection = collection;
    }

    public MongoClient getMongoClient() {
        return mongoClient;
    }

    public void setMongoClient(MongoClient mongoClient) {
        this.mongoClient = mongoClient;
    }
    
    public void insertKeyboard(Keyboard keyboard) {
        Document doc = new Document();
        doc.append("id", keyboard.getId());
        doc.append("brand", keyboard.getBrand());
        doc.append("weight",keyboard.getWeight());
        doc.append("color", keyboard.getColor());
        collection.insertOne(doc);   
        mongoClient.close();
    } 
    
    public Keyboard getKeyboardByBrand(String brandKeyboard) {
        Keyboard keyboard;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        String id;
        String brand;
        String weight;
        String color;
        Keyboard keyboardSearch = new Keyboard();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");          
            brand = gson.toJson(theObj.get("brand")).replace("\"", "");
            weight = gson.toJson(theObj.get("weight")).replace("\"", "");
            color = gson.toJson(theObj.get("color")).replace("\"", "");
            keyboard = new Keyboard(id, brand, weight ,color);
            if (brandKeyboard.equals(keyboard.getBrand())) {
                keyboardSearch = keyboard;
            }
        }
        return keyboardSearch;
    }    
    
    
    public List<Keyboard> getAllKeyboard() {
        Keyboard keyboard;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        List<Keyboard> keyboardModels = new ArrayList<>();
        String id;
        String brand;
        String weight;
        String color;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");            
            brand = gson.toJson(theObj.get("brand")).replace("\"", "");
            weight =  gson.toJson(theObj.get("weight")).replace("\"", "");
            color = gson.toJson(theObj.get("color")).replace("\"", "");
            keyboard = new Keyboard(id, brand, weight,color);
            keyboardModels.add(keyboard);
        }
        return keyboardModels;
    }    
}

