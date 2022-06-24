/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.hardwarestore.utils;

/**
 *
 * @author Christopher Yépez 
 */
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoDatabase;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.model.Filters;
import java.util.ArrayList;
import org.bson.Document;

public class MongoManager{  
    public static boolean save(String data,String databaseName,String collectionName,String mongoUri){
        MongoClientURI uri = new MongoClientURI(mongoUri);    
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase(databaseName);
        MongoCollection collection = database.getCollection(collectionName);
        Document objectRegistry = null;
        boolean saved = false;
        try{
            objectRegistry = Document.parse(data);  
            saved = true;
        }
        catch(Exception e){
            saved = false;
        }
        collection.insertOne(objectRegistry);
        mongoClient.close();   
        return saved;
    }
    
    
    public static ArrayList<String> findAll(String databaseName,String collectionName,String mongoUri){
        try {
        MongoClientURI uri = new MongoClientURI(mongoUri);       
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase(databaseName);
        MongoCollection<Document> collection = database.getCollection(collectionName);
        ArrayList<String> stringList = new ArrayList<>();
        ArrayList<Document> objectDList = new ArrayList<>();
        objectDList = collection.find().into(new ArrayList<>());
        for (Document object : objectDList) {
            String objectString = object.toJson();
            stringList.add(objectString);
        }
        mongoClient.close();
        return stringList;
        }                       
        catch (Exception e){
            System.out.println("Find Error..");
            return null;
        } 
    }
    public static String find(int idToFind,String idName,String databaseName,String collectionName,String mongoUri){
        try {
            MongoClientURI uri = new MongoClientURI(mongoUri); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase(databaseName);
            MongoCollection collection = database.getCollection(collectionName);
            Document found = (Document) collection.find(Filters.eq(idName,idToFind)).first();
            if(found!=null){
                System.out.println("Successful");  
                mongoClient.close();
                return (found.toJson());
            }
            System.out.println("Not Found");
            mongoClient.close();   
            return "null";
        }
        catch (Exception e){
            System.out.println("Find Error..");
            return "null";
        }  
    }
    public static boolean replace(int idToReplace,String idName,String data,String databaseName,String collectionName,String mongoUri){
        try {
            MongoClientURI uri = new MongoClientURI(mongoUri); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase(databaseName);
            MongoCollection<Document> collection = database.getCollection(collectionName);
            Document objectRegistry;
            objectRegistry = collection.find().filter(Filters.eq(idName,idToReplace)).first();
            Document updateRegistry;
            updateRegistry = Document.parse(data);
            collection.replaceOne(objectRegistry, updateRegistry);
            mongoClient.close();
            return true;
        }
        catch (Exception e){
            System.out.println("Update Error..");
            return false;
        }  
    }
    
    public static boolean delete(int idToDelete,String idName,String databaseName,String collectionName,String mongoUri){
        try {
            MongoClientURI uri = new MongoClientURI(mongoUri); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase(databaseName);
            MongoCollection collection = database.getCollection(collectionName);
            try{
            collection.deleteOne(Filters.eq(idName,idToDelete)); 
            mongoClient.close();                
            return true; 
            }
            catch(Exception e){
                System.out.println("Delete Error");
                return false;
            }
            
        }
        catch (Exception e){
            System.out.println("Delete Error..");
            return false;
        }  
    }
}

