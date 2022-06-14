/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.university.model;

import com.mongodb.client.MongoCollection;
import javax.swing.JOptionPane;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import org.bson.Document;
import javax.ws.rs.core.MediaType;

/**
import org.bson.Document;
 * REST Web Service
 *
 * @author SEBAS
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
     * @return an instance of java.lang.String
     */
    
 @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getJson(@PathParam("id")int id) {
     
      Instructor instructor= new Instructor();
     
     instructor.setId(id);
     instructor.setName("Sebastian Yanzapanta");
     instructor.setSalary(3000);
     instructor.setTc(true);

   MongoCollection <Document> instruct = new ConecctionDB().getDb().getCollection("Instructor_db");
        try{
        Document data= new Document();
        data.put("id",id);
        data.put("name",instructor.getName());
        data.put("salary",instructor.getSalary());
        data.put("Tc",instructor.isTc());
        instruct.insertOne(data);
       }catch(Exception err){
            System.out.println("error");
       }
     return instructor;
     
    }
    /**
     * PUT method for updating or creating an instance of InstructorResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
