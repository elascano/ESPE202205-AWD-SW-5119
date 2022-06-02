/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.utils;


import com.google.gson.Gson;
import java.net.UnknownHostException;

/**
 *
 * @author Christopher Yépez 
 */
import com.google.gson.Gson;
import com.mongodb.DBCursor;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import java.net.UnknownHostException;
import com.mongodb.ErrorCategory;
import com.mongodb.MongoWriteException;
import com.mongodb.client.FindIterable;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.model.Filters;
import com.mongodb.client.result.UpdateResult;
import java.util.Properties;
import org.bson.Document;

public class MongoManager{  
    public boolean save(String data){
        MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://christopher:Ligobas1209@cluster0.qfcgzcm.mongodb.net/?retryWrites=true&w=majority"); 
     
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase("University");
        MongoCollection collection = database.getCollection("Instructor");
        Document productregistry = null;
        boolean saved = false;
        try{
            productregistry = Document.parse(data);  
            saved = true;
        }
        catch(Exception e){
            saved = false;
        }
        collection.insertOne(productregistry);
        mongoClient.close();   
        return saved;
    }
    
    public static String find(int idToFind){
        try {
            MongoClientURI uri = new MongoClientURI(
            "mongodb+srv://christopher:Ligobas1209@cluster0.qfcgzcm.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("University");
            MongoCollection collection = database.getCollection("Instructor");
            Document found = (Document) collection.find(Filters.eq("id",idToFind)).first();
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
}

