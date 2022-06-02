/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.university.model;

import com.mongodb.client.MongoCollection;
import com.mongodb.util.JSON;
import java.util.ArrayList;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import org.bson.Document;

/**
 * REST Web Service
 *
 * @author HP
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
     * Retrieves representation of an instance of ec.edu.espe.university.model.InstructorResource
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
Instructor instructor= new Instructor();
@GET
    @Path("list")
    @Produces(MediaType.APPLICATION_JSON)
    public ArrayList<Instructor> getJson() {
    ArrayList<Instructor> arrayList = new ArrayList<Instructor>();
    return  putJson();
      
             
    }
  
    /**
     * PUT method for updating or creating an instance of InstructorResource
     * @param content representation for the resource
     */
    @PUT
     @Produces(MediaType.APPLICATION_JSON)
    @Consumes(MediaType.APPLICATION_JSON)
    public ArrayList<Instructor> putJson() {
     ArrayList<Instructor> arrayList = new ArrayList<Instructor>();
        Instructor instructor1=new Instructor(1,"Jonathan",1500,true);
        Instructor instructor2=new Instructor(2,"Dennis",2500,false);
        Instructor instructor3=new Instructor(3,"Cristian",3500,true);
     arrayList.add(instructor1);
     arrayList.add(instructor2);
     arrayList.add(instructor3);
    
     return arrayList;
    }
    
    
    
}
