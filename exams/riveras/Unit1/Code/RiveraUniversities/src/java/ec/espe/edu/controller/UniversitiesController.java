/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.controller;

import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import java.util.Date;
import ec.espe.edu.utilities.DBManager;
import ec.espe.edu.utilities.MongoDBManager;
import java.sql.Connection;
import java.sql.PreparedStatement;
import org.bson.Document;
import org.bson.types.ObjectId;
import ec.espe.edu.model.Universities;

/**
 *
 * @author User
 */
public class UniversitiesController {
    private Universities employee;
    private String uri;
    private Connection conn;
    private PreparedStatement  stm;
    private MongoDatabase dataBase;
    private MongoCollection<Document> collection;
    private Document document =new Document("_id", new ObjectId());
    
     public UniversitiesController(Universities employee) {
        this.employee = employee;
        
        this.uri = "localhost:27017";
    }
     
    public String insertEmployeeMongo(String idEmployee, String name, String address, String telephone, String mail, String lastJob, String bornYear){
        MongoClientURI uriMongo = new MongoClientURI(this.uri);
        try(MongoClient mongoClient = new MongoClient(uriMongo)){
            this.dataBase = mongoClient.getDatabase("Company");			
            this.collection = this.dataBase.getCollection("Universities");
            this.document.append("id", this.employee.getIdUniversities());
            this.document.append("name", this.employee.getName());
            this.document.append("Adress", this.employee.getAddress());
            this.document.append("telephone", this.employee.getTelephone());
            this.document.append("mail", this.employee.getMail());
            this.document.append("type", this.employee.getType());
            this.document.append("date", this.employee.getDate());
            this.collection.insertOne(this.document);
            return "Employee saved in MongoDB!" ;
        }catch(Exception ex){
            return "Cant connect with data base.";
        }
    }

}





 

