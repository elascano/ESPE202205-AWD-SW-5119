/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.controller;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.university.model.Instructor;
import org.bson.Document;

/**
 *
 * @author yuliana
 */
public class DBManager {
    MongoDatabase baseDatos;
    //DBCollection collection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;

    Gson gson = new Gson();

    public DBManager(String nameCollection) {
        try {
            this.nameCollection = nameCollection;
            String data;
            data = "mongodb+srv://Yulliana:1234Yuli1234@cluster0.2f5ph.mongodb.net/test";

            MongoClientURI uri;
            uri = new MongoClientURI(data);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase("Instructor");
            collection = baseDatos.getCollection(nameCollection);
            System.out.println("conection to database sucessfully");

        } catch (Exception e) {
            System.out.println("no ingresa");

        }
        
    }
    
    public void insert(Instructor instructor) {
        Document doc = new Document();
        doc.append("id", instructor.getId());
        doc.append("name", instructor.getName());
        doc.append("salary",instructor.getSalary());
        doc.append("tc", instructor.isTC());
        collection.insertOne(doc);   
        mongo.close();
    }
    
    public Instructor retrieve(int idPatient) {
        Instructor instructor;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int id;
        String name;
        float salary;
        boolean TC;
        Instructor instructorRetrieved = new Instructor();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = Integer.parseInt(gson.toJson(theObj.get("id")));            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            salary=Float.parseFloat(gson.toJson(theObj.get("salary")));
            TC=Boolean.parseBoolean(gson.toJson(theObj.get("tc")));
            instructor = new Instructor(id, name, salary,TC);
            if (idPatient == instructor.getId()) {
                instructorRetrieved = instructor;
            }
        }
        return instructorRetrieved;
    }
}
