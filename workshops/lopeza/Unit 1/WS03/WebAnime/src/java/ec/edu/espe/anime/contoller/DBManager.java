/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.anime.contoller;

import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.MongoSecurityException;
import com.mongodb.client.FindIterable;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import static com.mongodb.client.model.Filters.gte;
import org.bson.Document;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

/**
 *
 * @author Andrés López
 */
public class DBManager {
    private static DBManager instance;
    private static MongoClientURI uri;
    private static MongoClient mongoClient;
    private static MongoDatabase database;
    private static MongoCollection<Document> collection;

    JSONArray jsonArray = new JSONArray();
    JSONParser jsonParser = new JSONParser();

    private DBManager() {

    }

    public static DBManager getInstance() {
        if (instance == null) {
            instance = new DBManager();
        }
        return instance;
    }

    public static MongoDatabase connection(String user, String password, String nameOfDatabase) {

        String URI = "mongodb+srv://" + user + ":" + password + "@clusterawd.rbj5oin.mongodb.net/" + nameOfDatabase + "?retryWrites=true&w=majority";
        //mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority
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
    
    public static MongoCollection findCollection(String collection, MongoDatabase database) {
        MongoCollection<Document> collections = database.getCollection(collection);

        return collections;
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
}