/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.utils;

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
import org.bson.Document;

import ec.edu.espe.university.model.Sport;
import java.awt.print.Book;
import java.util.ArrayList;
import java.util.List;
import org.bson.BSONObject;

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
           cluster = "mongodb://edison19:admin@ac-zvfenfd-shard-00-00.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-01.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-02.rbj5oin.mongodb.net:27017/?ssl=true&replicaSet=atlas-jretwc-shard-0&authSource=admin&retryWrites=true&w=majority";
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
    
    public void insertSport(Sport sport) {
        Document doc = new Document();
        doc.append("id", sport.getId());
        doc.append("name", sport.getName());
        doc.append("type",sport.getType());
        doc.append("tags", sport.getTags());
        doc.append("description", sport.getDescription());
        doc.append("benefits", sport.getBenefits());
        collection.insertOne(doc);   
        mongoClient.close();
    }
        
    public Sport getSportById(String idSport) {
        Sport sport;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        String id;
        String name;
        String type;
        String tags;
        String description;
        String benefits;
        Sport sportSearch = new Sport();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            type = gson.toJson(theObj.get("type")).replace("\"", "");
            tags = gson.toJson(theObj.get("tags")).replace("\"", "");
            description = gson.toJson(theObj.get("description")).replace("\"", "");
            benefits = gson.toJson(theObj.get("benefits")).replace("\"", "");
            sport = new Sport(id, name, type, tags, description, benefits);
            if (idSport.equals(sport.getId())) {
                sportSearch = sport;
            }
        }
        return sportSearch;
    }    
    
     public List<Sport> getAllSports() {
        Sport sport;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        List<Sport> sportModels = new ArrayList<>();
        String id;
        String name;
        String type;
        String tags;
        String description;
        String benefits;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            type = gson.toJson(theObj.get("type")).replace("\"", "");
            tags = gson.toJson(theObj.get("tags")).replace("\"", "");
            description = gson.toJson(theObj.get("description")).replace("\"", "");
            benefits = gson.toJson(theObj.get("benefits")).replace("\"", "");
            sport = new Sport(id, name, type, tags, description, benefits);
            sportModels.add(sport);
        }    
        return sportModels;
    }       

}