/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.student.control;

import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import com.mongodb.client.model.Filters;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author avand
 */
public class MongoDbManager {
        public static boolean save(String data){
        MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
     
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase("studentsDb");
        MongoCollection collection = database.getCollection("students");
        Document instructorRegistry = null;
        boolean saved = false;
        try{
            instructorRegistry = Document.parse(data);  
            saved = true;
        }
        catch(Exception e){
            saved = false;
        }
        collection.insertOne(instructorRegistry);
        mongoClient.close();   
        return saved;
    }
    public static ArrayList<String> findAll(){
        try {
       MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
        MongoClient mongoClient = new MongoClient(uri);
        MongoDatabase database = mongoClient.getDatabase("studentsDb");
        MongoCollection<Document> collection = database.getCollection("students");
        ArrayList<String> stringList = new ArrayList<>();
        ArrayList<Document> intructorDList = new ArrayList<>();
        intructorDList = collection.find().into(new ArrayList<>());
        for (Document instructor : intructorDList) {
            String instructorString = instructor.toJson();
            stringList.add(instructorString);
        }
        return stringList;
        }                       
        catch (Exception e){
            System.out.println("Find Error..");
            return null;
        } 
    }
    public static String find(int idToFind){
        try {
          MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("studentsDb");
            MongoCollection collection = database.getCollection("students");
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
    public static boolean replace(int idToReplace,String data){
        try {
          MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("studentsDb");
            MongoCollection<Document> collection = database.getCollection("students");
            Document instructorRegistry;
            instructorRegistry = collection.find().filter(Filters.eq("id",idToReplace)).first();
            Document updateRegistry;
            updateRegistry = Document.parse(data);
            collection.replaceOne(instructorRegistry, updateRegistry);
            return true;
        }
        catch (Exception e){
            System.out.println("Update Error..");
            return false;
        }  
    }
    
    public static boolean delete(int idToDelete){
        try {
          MongoClientURI uri = new MongoClientURI(
        "mongodb+srv://AndresValarezo:1234@cluster0.yxwn5.mongodb.net/?retryWrites=true&w=majority"); 
            MongoClient mongoClient = new MongoClient(uri);
            MongoDatabase database = mongoClient.getDatabase("studentsDb");
            MongoCollection collection = database.getCollection("students");
            try{
              collection.deleteOne(Filters.eq("id",idToDelete)); 
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
