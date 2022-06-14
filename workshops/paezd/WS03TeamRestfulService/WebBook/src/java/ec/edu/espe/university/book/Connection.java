/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package ec.edu.espe.university.book;

/**
 *
 * @author Fernando
 */
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
import java.util.ArrayList;
import java.util.List;
import org.bson.Document;

    
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
    
    public void insertBook(Book book) {
        Document doc = new Document();
        doc.append("id", book.getId());
        doc.append("name", book.getName());
        doc.append("year",book.getYear());
        doc.append("author", book.getAuthor());
        collection.insertOne(doc);   
        mongoClient.close();
    } 
    
    public Book getBookByName(String nameBook) {
        Book book;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        String id;
        String name;
        String year;
        String author;
        Book bookSearch = new Book();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");          
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            year = gson.toJson(theObj.get("year")).replace("\"", "");
            author = gson.toJson(theObj.get("author")).replace("\"", "");
            book = new Book(id, name, year,author);
            if (nameBook.equals(book.getName())) {
                bookSearch = book;
            }
        }
        return bookSearch;
    }    
    
    
    public List<Book> getAllBook() {
        Book book;
        MongoCursor<Document> resultDocument = collection.find().iterator();
        List<Book> bookModels = new ArrayList<>();
        String id;
        String name;
        String year;
        String author;
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            id = gson.toJson(theObj.get("id")).replace("\"", "");            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            year =  gson.toJson(theObj.get("year")).replace("\"", "");
            author = gson.toJson(theObj.get("author")).replace("\"", "");
            book = new Book(id, name, year,author);
            bookModels.add(book);
        }
        return bookModels;
    }    
}
