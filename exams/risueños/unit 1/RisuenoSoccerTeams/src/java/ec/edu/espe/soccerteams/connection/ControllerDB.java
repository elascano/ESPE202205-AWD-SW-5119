/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.soccerteams.connection;
import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.soccerteams.model.SoccerTeam;
import java.util.ArrayList;
import java.util.List;
import org.bson.Document;
/**
 *
 * @author santy
 */
public class ControllerDB {
    MongoDatabase dataBase; 
    MongoClient mongoClient;
    String cluster;
    String nameCollection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    Gson gson = new Gson();
    
    public ControllerDB(String nameCollection) {
        try {
            this.nameCollection = nameCollection;
            cluster = "mongodb://edison19:admin@ac-zvfenfd-shard-00-00.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-01.rbj5oin.mongodb.net:27017,ac-zvfenfd-shard-00-02.rbj5oin.mongodb.net:27017/?ssl=true&replicaSet=atlas-jretwc-shard-0&authSource=admin&retryWrites=true&w=majority";
            MongoClientURI uri;
            uri = new MongoClientURI(cluster);
            mongoClient =  new MongoClient(uri);
            dataBase = mongoClient.getDatabase("AWD5119");
            
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
    
    public void insertTeam(SoccerTeam soccerTeam){
        Document obj = new Document();
        obj.append("id",soccerTeam.getId());
        obj.append("name",soccerTeam.getName());
        obj.append("numberPlayers",soccerTeam.getNumberPlayers());
        obj.append("rankTeam",soccerTeam.getRankTeam());
        obj.append("region",soccerTeam.getRegion());
        obj.append("category",soccerTeam.getCategory());
        obj.append("numberForeigners",soccerTeam.getNumberForeigners());
        obj.append("templateCost",soccerTeam.getTemplateCost());
        collection.insertOne(obj);   
        mongoClient.close();
    }
    
    public SoccerTeam getSoccerTeamByName(String nameTeam) {
        SoccerTeam soccerTeam;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        String id;
        String name;
        int numberPlayers;
        String rankTeam;
        String region;
        String category;
        int numberForeigners;
        float templateCost;
        
        SoccerTeam searchTeam = new SoccerTeam();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");          
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            numberPlayers = Integer.valueOf(gson.toJson(theObj.get("numberPlayers")).replace("\"", ""));
            rankTeam = gson.toJson(theObj.get("author")).replace("\"", "");
            region = gson.toJson(theObj.get("author")).replace("\"", "");
            category = gson.toJson(theObj.get("author")).replace("\"", "");
            numberForeigners =  Integer.valueOf(gson.toJson(theObj.get("author")).replace("\"", ""));
            templateCost =  Integer.valueOf(gson.toJson(theObj.get("author")).replace("\"", ""));
            
            soccerTeam = new SoccerTeam(id, name, numberPlayers,rankTeam,region,category,numberForeigners,templateCost);
            if (nameTeam.equals(soccerTeam.getName())) {
                searchTeam = soccerTeam;
            }
        }
        return searchTeam;
    }
    public List<SoccerTeam> getAllTeam() {
        SoccerTeam soccerTeam;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        List<SoccerTeam> teamType = new ArrayList<>();
        String id;
        String name;
        int numberPlayers;
        String rankTeam;
        String region;
        String category;
        int numberForeigners;
        float templateCost;
        
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");          
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            numberPlayers = Integer.valueOf(gson.toJson(theObj.get("numberPlayers")).replace("\"", ""));
            rankTeam = gson.toJson(theObj.get("author")).replace("\"", "");
            region = gson.toJson(theObj.get("author")).replace("\"", "");
            category = gson.toJson(theObj.get("author")).replace("\"", "");
            numberForeigners =  Integer.valueOf(gson.toJson(theObj.get("author")).replace("\"", ""));
            templateCost =  Integer.valueOf(gson.toJson(theObj.get("author")).replace("\"", ""));
            soccerTeam = new SoccerTeam(id, name, numberPlayers,rankTeam,region,category,numberForeigners,templateCost);
            teamType.add(soccerTeam);
        }
        return teamType;
    }      
}



