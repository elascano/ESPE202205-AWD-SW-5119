/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.espe.edu.utilities;

import com.mongodb.MongoClient;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import org.bson.Document;
import org.bson.types.ObjectId;

/**
 *
 * @author User
 */
public class MongoDBManager extends DBManager{
    
    private String uri = "localhost:27017";
    private MongoDatabase dataBase;
    private MongoCollection<Document> collection;
    private Document document = new Document("_id", new ObjectId());
    private MongoClient mongoClient;
    
    @Override
    public boolean connect(){
        return false;
    }

    @Override
    public String insertData(String data){
        return "";
    }
    
}