/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.university.webservices;

import com.google.gson.Gson;
import com.mongodb.client.MongoDatabase;
import ec.edu.espe.university.contoller.DBManager;
import ec.edu.espe.university.model.Instructor;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;                                                                                                             
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import org.json.simple.parser.ParseException;

/**
 * REST Web Service
 *
 * @author Andrés López
 */

@Path("/instructor")
@Consumes(MediaType.APPLICATION_JSON)
@Produces(MediaType.APPLICATION_JSON)
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
     * @param id
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
    @GET
    @Path("/{id}")
    public Instructor getInstructor(@PathParam("id") int id) {
        String stringInstructor = "";
        String collection = "Instructor";
        MongoDatabase database; 
        Instructor instructor = new Instructor();
        Gson gson = new Gson();
        DBManager dbManager = new DBManager();
        
        database = dbManager.connection("ailopez4", "Andres13", "WebUniversity");
        stringInstructor = dbManager.find(collection, "id", id, database);
        instructor = gson.fromJson(stringInstructor, Instructor.class);
        
        return instructor;
    }
    
    @GET
    public String getJson() throws ParseException {
        String collection = "Instructor";
        MongoDatabase database; 
        DBManager dbManager = new DBManager();
        
        database = dbManager.connection("ailopez4", "Andres13", "WebUniversity");
        
        return dbManager.completeModel(collection, database); 
    }
    
    @GET
    @Path("{id},{name},{salary},{TC}")
    public String createInstructor(@PathParam("id") int id, @PathParam("name") String name, @PathParam("salary") float salary,
            @PathParam("TC") boolean TC) {
        String collection = "Instructor";
        MongoDatabase database; 
        Instructor instructor = new Instructor(id, name, salary, TC);
        DBManager dbManager = new DBManager();
        
        dbManager.connect();
        dbManager.create(instructor);
        
        return instructor.getId() + " " + instructor.getName() + " " + instructor.getSalary()+ " " + instructor.isTC();
    }
    
    @GET
    @Path("{id},{name}")
    public String updateInstructor(@PathParam("id") int id, @PathParam("name") String name) {
        String collection = "Instructor";
        MongoDatabase database; 
        DBManager dbManager = new DBManager();
        
        dbManager.connect();
        dbManager.update(id, name);
        
        return "id: " + id + "\nName: " + name;
    }
    
    @DELETE
    @Path("{id}")
    public String deleteInstructor(@PathParam("id") int id) {
        DBManager dbManager = new DBManager();
        
        dbManager.connect();
        dbManager.delete(id);
        return "id: " + id;
    }
   
}