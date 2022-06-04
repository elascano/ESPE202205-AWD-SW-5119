/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.contoller;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.MongoSecurityException;
import com.mongodb.client.FindIterable;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import static com.mongodb.client.model.Filters.gte;
import ec.edu.espe.university.model.Instructor;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.bson.Document;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

/**
 *
 * @author Jhonatan Lituma & Andrés López
 */
public class DBManager {
    private static DBManager instance;
    private static MongoClientURI uri;
    private static MongoClient mongoClient;
    private static MongoDatabase database;
    private static MongoCollection<Document> collection;
    private BasicDBObject document = new BasicDBObject();
    private DBCollection dbCollection;
    private DB dataBase;

    JSONArray jsonArray = new JSONArray();
    JSONParser jsonParser = new JSONParser();

    public DBManager() {

    }

    public static DBManager getInstance() {
        if (instance == null) {
            instance = new DBManager();
        }
        return instance;
    }

    public static MongoDatabase connection(String user, String password, String nameOfDatabase) {

        String URI = "mongodb+srv://" + user + ":" + password + "@cluster0.skhvbgm.mongodb.net/" + nameOfDatabase + "?retryWrites=true&w=majority";
        try {
            uri = new MongoClientURI(URI);
            mongoClient = new MongoClient(uri);
            database = mongoClient.getDatabase(nameOfDatabase);

            database.createCollection("Comprobation");
            collection = database.getCollection("Comprobation");
            collection.drop();

        } catch (MongoSecurityException a) {
            database = null;
        }

        return database;
    }
    
    public void connect(){
        
        try{
            uri = new MongoClientURI("mongodb+srv://ailopez4:Andres13@cluster0.skhvbgm.mongodb.net/?retryWrites=true&w=majority");
            mongoClient = new MongoClient(uri);
            
            dataBase = mongoClient.getDB("WebUniversity");
            dbCollection = dataBase.getCollection("Instructor"); 
            
        }catch(NullPointerException ex){
            Logger.getLogger(DBManager.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public static String find(String col, String key, Object value, MongoDatabase database) {
        String find = "";
        MongoCollection<Document> collections = database.getCollection(col);
        FindIterable<Document> iterable = collections.find(gte(key, value));
        MongoCursor<Document> cursor = iterable.iterator();
        while (cursor.hasNext()) {
            find = cursor.next().toJson();
        }
        return find;
    }
    
    public static String completeModel(String col, MongoDatabase database) throws ParseException {
        String json = "";
        JSONArray jsonArray = new JSONArray();
        MongoCollection<Document> collection = database.getCollection(col);
        MongoCursor<Document> resultDocument = collection.find().iterator();
        while (resultDocument.hasNext()) {
            JSONObject jsonObject = (JSONObject) new JSONParser().parse(resultDocument.next().toJson());
            jsonObject.remove("_id");
            jsonArray.add(jsonObject);
            json = jsonArray.toJSONString();
        }
        return json;
    }
    
    public void create(Instructor instructor){
        document.append("id", instructor.getId());
        document.append("name", instructor.getName());
        document.append("salary", instructor.getSalary());
        document.append("TC", instructor.isTC());
        
        dbCollection.insert(document);
    }
    
    public void update(int id, String name){
        BasicDBObject findTestItemQuery = new BasicDBObject();
        findTestItemQuery.put("id", id);
        DBCursor testItemsCursor = dbCollection.find(findTestItemQuery);
        
        if(testItemsCursor.hasNext()){
            DBObject testCodeItem = testItemsCursor.next();
            testCodeItem.put("name", name);
            dbCollection.save(testCodeItem);
        }
    }
    
    public void delete(int id){
        document.append("id", id);
        collection.findOneAndDelete(document);
        
    }
}