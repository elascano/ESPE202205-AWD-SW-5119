/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.university.model.Instructor;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

import static com.mongodb.client.model.Filters.eq;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.FindIterable;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import com.mongodb.util.JSON;
import org.bson.conversions.Bson;
import java.util.concurrent.TimeUnit;
import org.bson.Document;

import com.google.gson.Gson;
import com.mongodb.client.model.Filters;
import javax.json.Json;

/*
 * Requires the MongoDB Java Driver.
 * https://mongodb.github.io/mongo-java-driver
 */
@Path("instructor")
public class InstructorResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of InstructorResource
     */
    public InstructorResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.InstructorResource
     *
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
    @GET

    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getJson(@PathParam("id") int id) {

        Bson filter = eq("id", id);

        MongoClient mongoClient = new MongoClient(
                new MongoClientURI(
                        "mongodb+srv://theo:EarthBound199%40@cluster0.a5a7tft.mongodb.net/test?authSource=admin&replicaSet=atlas-553h1j-shard-0&readPreference=primary&appname=MongoDB%20Compass&ssl=true"
                )
        );
        MongoDatabase database = mongoClient.getDatabase("database1");
        MongoCollection<Document> collection = database.getCollection("instructor");
        
        Document result = (Document) collection.find(Filters.eq("id",id)).first();

        Gson gson = new Gson();
        Instructor instructor = gson.fromJson(JSON.serialize(result), Instructor.class);

        return instructor;

    }

    /**
     * PUT method for updating or creating an instance of InstructorResource
     *
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Instructor content) {
    }
}
