package webservices;

import com.google.gson.Gson;
import com.mongodb.BasicDBObject;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoCursor;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.model.Person;
import java.util.ArrayList;
import org.bson.Document;

/**
 *
 * @author yuliana
 */
public class DBManage {
    MongoDatabase baseDatos;
    //DBCollection collection;
    BasicDBObject document = new BasicDBObject();
    MongoCollection<Document> collection;
    MongoClient mongo;
    String nameCollection;

    Gson gson = new Gson();

    public DBManage(String nameCollection) {
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
    
    public void insert(Person person) {
        Document doc = new Document();
        doc.append("ci", person.getCi());
        doc.append("name", person.getName());
        doc.append("age",person.getAge());
        doc.append("gender", person.getGender());
        collection.insertOne(doc);   
        mongo.close();
    }
    
    public Person retrieve(int idPatient) {
        Person person;
        MongoCursor<Document> resultDocument = collection.find().iterator();
         String ci;
         String name;
        int age;
         String gender;
        Person personRetrieved = new Person();
        while (resultDocument.hasNext()) {
            Document theObj = resultDocument.next();
            ci = gson.toJson(theObj.get("ci"));            
            name = gson.toJson(theObj.get("name")).replace("\"", "");
            age=Integer.parseInt(gson.toJson(theObj.get("age")));
            gender=gson.toJson(theObj.get("gender"));
            person = new Person(ci, name, age,gender);
            if (ci == person.getCi()) {
                personRetrieved = person;
            }
        }
        return personRetrieved;
    }
    
}