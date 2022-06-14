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

import ec.edu.espe.university.model.Instructor;
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
            cluster = "mongodb+srv://Fernandox:Nandox.11@cluster0.o2sva.mongodb.net/?retryWrites=true&w=majority";
            MongoClientURI uri;
            uri = new MongoClientURI(cluster);
            mongoClient =  new MongoClient(uri);
            dataBase = mongoClient.getDatabase("university_managment");
            
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
    
    public void insertInstructor(Instructor instructor) {
        Document doc = new Document();
        doc.append("id", instructor.getId());
        doc.append("name", instructor.getName());
        doc.append("salary",instructor.getSalary());
        doc.append("tc", instructor.isTC());
        collection.insertOne(doc);   
        mongoClient.close();
    }
        
    public Instructor getInstructorById(int idInstructor) {
        Instructor instructor;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int id;
        String name;
        float salary;
        boolean TC;
        Instructor instructorSearch = new Instructor();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = Integer.parseInt(gson.toJson(theObj.get("id")));            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            salary=Float.parseFloat(gson.toJson(theObj.get("salary")));
            TC=Boolean.parseBoolean(gson.toJson(theObj.get("tc")));
            instructor = new Instructor(id, name, salary,TC);
            if (idInstructor == instructor.getId()) {
                instructorSearch = instructor;
            }
        }
        return instructorSearch;
    }    
    
     public List<Instructor> getAllIstructor() {
        Instructor instructor;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        List<Instructor> instructorModels = new ArrayList<>();
        int id;
        String name;
        float salary;
        boolean TC;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = Integer.parseInt(gson.toJson(theObj.get("id")));            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            salary=Float.parseFloat(gson.toJson(theObj.get("salary")));
            TC=Boolean.parseBoolean(gson.toJson(theObj.get("tc")));
            instructor = new Instructor(id, name, salary,TC);
            instructorModels.add(instructor);
        }
        return instructorModels;
    }    
        
    public Document generateInstructorDocument(Instructor instructor) {
        Document admin;
        admin = new Document("id", instructor.getId());
        admin.append("name", instructor.getName());
        admin.append("salary", instructor.getSalary());
        admin.append("tc", instructor.isTC());
        return admin;
    }
    
    public void deleteInstructor(Instructor instructor){
        try {
            Document findDocument = generateInstructorDocument(instructor);
            collection.findOneAndDelete(findDocument);
            System.out.println("Se elimino correctamente");
        } catch (Exception e) {
            Document findDocument = generateInstructorDocument(instructor);
            collection.findOneAndDelete(findDocument);
        }
    }  
}
