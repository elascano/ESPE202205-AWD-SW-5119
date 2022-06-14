/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.utils;

import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;

import com.mongodb.client.MongoDatabase;

import com.mongodb.client.MongoCollection;

import com.mongodb.client.model.Filters;

import org.bson.Document;

public class MongoAtlasManager  {
    
    public boolean save(String data){
        MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
        
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase("instructorsDb");
        MongoCollection collection = database.getCollection("instructors");
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
    
    public static String find(String idname){
        try {
            MongoClientURI uri = new MongoClientURI(
            "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("instructorsDb");
            MongoCollection collection = database.getCollection("instructors");
            Document found = (Document) collection.find(Filters.eq("id",idname)).first();
            if(found!=null){
                System.out.println("Succesful");
                System.out.println(found.toString());   
                mongoClient.close();
                return (found.toJson());
            }
            else{
                System.out.println("Don´t find the id");
                mongoClient.close();   
                return "null";
            }
        }
        catch (Exception e){
            System.out.println("Error..");
            return "null";
        }
        
    }

    
    public  boolean delete(String table,String name){
             try {
            MongoClientURI uri = new MongoClientURI(
            "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("instructorsDb");
            MongoCollection collection = database.getCollection("instructors");
            Document found = (Document) collection.find(Filters.eq("name",name)).first();
            if(found!=null){
                collection.deleteOne(Filters.eq("name",name)); 
                mongoClient.close();                
               return true;
            }
            else{
                mongoClient.close();   
                return false;
            }
        }
        catch (Exception e){
               System.out.println("Don´t delete succesfull"); 
               return false;
        }
    }
    public void updateName(String nameToChange,String nameToUpdate){
            try{
            MongoClientURI uri = new MongoClientURI(
            "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("instructorsDb");
            MongoCollection<Document> collection = database.getCollection("instructors"); 
            Document firstDocument;
            firstDocument = collection.find().filter(Filters.eq("name", nameToChange)).first();           
            firstDocument.replace("name",nameToUpdate);
            collection.replaceOne(Filters.gte("name",nameToChange), firstDocument);
            mongoClient.close();
            }
            catch(Exception e){
                System.out.println("Error in the update");
            }
            
    }
}
