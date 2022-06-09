/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.model;

import Controller.MusicInst;
import javax.swing.text.Document;
import com.mongodb.BasicDBObject;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import com.mongodb.client.model.Filters;
import javax.management.ObjectName;
import org.bson.types.ObjectId;

/**
 *
 * @author marce
 */
public class MongoDBManager {
    private String uri="mongodb+srv://Dm2v:Espe2022@cluster0.wvysmrz.mongodb.net/?retryWrites=true&w=majority";
    //mongodb+srv://Dm2v:Espe2022@cluster0.wvysmrz.mongodb.net/?retryWrites=true&w=majority
    private MongoDatabase dataBase;
    private MongoCollection<org.bson.Document> collection;
    private org.bson.Document document=new org.bson.Document("_name", new ObjectId());
    
    
    //Create 
    public boolean create(MusicInst musicInst){
        MongoClientURI uriMongo=new MongoClientURI(uri);
        try(MongoClient mongoClient = new MongoClient(uriMongo))
	{
            dataBase = mongoClient.getDatabase("HW08");			
            collection = dataBase.getCollection("MusicInstruments");
            document.append("name", musicInst.getName());
            document.append("clasification", musicInst.getClasification());
            document.append("size", musicInst.getSize());
            document.append("type", musicInst.getType());
            document.append("approxPrice", musicInst.getPrice());
            collection.insertOne(document);
            return true;
	}	
       
    }
    
    //Update 
    public boolean update(String name, MusicInst musicInst) { 
        MongoClientURI uriMongo=new MongoClientURI(uri);
        try(MongoClient mongoClient = new MongoClient(uriMongo))
	{
            dataBase = mongoClient.getDatabase("HW08");			
            collection = dataBase.getCollection("MusicInstruments");
            org.bson.Document auxDocument = new org.bson.Document();
            auxDocument.put("name",name);
            
            org.bson.Document newDocument = new org.bson.Document();
            newDocument.put("name", musicInst.getName());
            
            org.bson.Document update = new org.bson.Document();
            update.append("$set", newDocument);
            collection.updateMany(auxDocument, update);
            return true;
	}
    }
    
    //Delete 
    public boolean delete(int id) {
        
        MongoClientURI uriMongo=new MongoClientURI(uri);
        try(MongoClient mongoClient = new MongoClient(uriMongo))
	{
            dataBase = mongoClient.getDatabase("HW08");			
            collection = dataBase.getCollection("MusicInstruments");
            collection.deleteOne(Filters.eq("name", "Bateria"));
            return true;
	}
        
    }
}
