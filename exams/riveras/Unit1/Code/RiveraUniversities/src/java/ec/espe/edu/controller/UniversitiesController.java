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
import ec.espe.edu.util.DBManager;
import ec.espe.edu.util.MongoDBManage;
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
    private Universities universities;
    private String uri;
    private Connection conn;
    private PreparedStatement  stm;
    private MongoDatabase dataBase;
    private MongoCollection<Document> collection;
    private Document document =new Document("_id", new ObjectId());
    
    
    public UniversitiesController(Universities universities) {
        this.universities = universities;
        
        this.uri = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/test";
    }
    public String insertUniversitiesMongo(String idUniversities, String name, String address, String telephone, String mail){
        MongoClientURI uriMongo = new MongoClientURI(this.uri);
        try(MongoClient mongoClient = new MongoClient(uriMongo)){
            this.dataBase = mongoClient.getDatabase("company");			
            this.collection = this.dataBase.getCollection("universities");
            this.document.append("id", this.universities.getIdUniversities());
            this.document.append("name", this.universities.getName());
            this.document.append("Adress", this.universities.getAddress());
            this.document.append("telephone", this.universities.getTelephone());
            this.document.append("mail", this.universities.getMail());
            this.collection.insertOne(this.document);
            return "universities saved in MongoDB!" ;
        }catch(Exception ex){
            return "Cant connect with data base.";
        }
    }
}
