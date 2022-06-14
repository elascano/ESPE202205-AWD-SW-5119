/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.soccer.control;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.soccer.model.SoccerPlayer;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author usuario
 */
public class DbManager {

    MongoDatabase baseDatos;
    //DBCollection collection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;

    Gson gson = new Gson();

    public DbManager(String nameCollection) {
        try {
            this.nameCollection = nameCollection;
            String data;
            data = "mongodb+srv://edison19:admin@clusterawd.rbj5oin.mongodb.net/?retryWrites=true&w=majority";

            MongoClientURI uri;
            uri = new MongoClientURI(data);
            mongo = new MongoClient(uri);
            baseDatos = mongo.getDatabase("AWD5119");
            collection = baseDatos.getCollection(nameCollection);
            System.out.println("conection to database sucessfully");

        } catch (Exception e) {
            System.out.println("error 404 not found");

        }

    }

    public SoccerPlayer search(int id) {
        SoccerPlayer soccerPlayer;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int idRetrieved;
        String name;
        String team;
        String position;
        int age;
        SoccerPlayer soccerPlayerRetrieved = new SoccerPlayer();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            idRetrieved = Integer.parseInt(gson.toJson(theObj.get("id")));
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            team = gson.toJson(theObj.get("team")).replace("\"", "");
            position = gson.toJson(theObj.get("position")).replace("\"", "");
            age = Integer.parseInt(gson.toJson(theObj.get("age")));
            soccerPlayer = new SoccerPlayer(idRetrieved, name, team, position, age);
            if (id == soccerPlayer.getId()) {
                soccerPlayerRetrieved = soccerPlayer;
            }
        }
        return soccerPlayerRetrieved;
    }

    public ArrayList<SoccerPlayer> retrievePlayers() {
        ArrayList<SoccerPlayer> players = new ArrayList<>();
        MongoCursor<Document> resultDocument = collection.find().iterator();
        int id;
        String name;
        String team;
        String position;
        int age;
        SoccerPlayer player;

        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = Integer.parseInt(gson.toJson(theObj.get("id")));
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            team = gson.toJson(theObj.get("team")).replace("\"", "");
            position = gson.toJson(theObj.get("position")).replace("\"", "");
            age = Integer.parseInt(gson.toJson(theObj.get("age")));
            player = new SoccerPlayer(id, name, team, position, age);
            players.add(player);

        }
        return players;
    }
}
