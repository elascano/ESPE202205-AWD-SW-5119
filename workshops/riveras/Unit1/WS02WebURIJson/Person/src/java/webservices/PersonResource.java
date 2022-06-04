/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import com.google.gson.Gson;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import com.mongodb.client.model.Filters;
import static com.mongodb.client.model.Filters.eq;
import com.mongodb.util.JSON;
import ec.edu.espe.model.Person;
import javax.swing.text.Document;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import static jdk.nashorn.internal.runtime.Debug.id;
import org.bson.conversions.Bson;

/**
 * REST Web Service
 *
 * @author User
 */
@Path("person")
public class PersonResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of PersonResource
     */
    public PersonResource() {
    }

    /**
     * Retrieves representation of an instance of webservices.PersonResource
     * @return an instance of ec.edu.espe.model.Person
     */
    @GET
    @Path("{ci}")
    @Produces(MediaType.APPLICATION_JSON)
    public Person getJson(@PathParam("ci") String ci) {
        DBManage dbManage=new DBManage();
        Person person= dbManage.serch("ci");
        return person;
    }

    /**
     * PUT method for updating or creating an instance of PersonResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Person content) {
    }
}
