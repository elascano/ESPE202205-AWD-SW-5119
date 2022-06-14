/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.webservices;

import com.google.gson.Gson;
import ec.edu.espe.university.controller.DBManager;
import ec.edu.espe.university.model.Instructor;
import javax.faces.annotation.RequestMap;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author yuliana
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
     * Retrieves representation of an instance of
     * ec.edu.espe.webservices.InstructorResource
     *
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getJson(@PathParam("id") int id) {
        //TODO return proper representation object
        DBManager mongo = new DBManager("University");
        Instructor instructor = mongo.retrieve(id);
        return instructor;
    }
    

    /**
     * PUT method for updating or creating an instance of InstructorResource
     *
     * @param content representation for the resource
     */
    @PUT
//    @Path("{id}")
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public void putJson(Instructor instruc){//,@PathParam("id")int id) {                
        //DBManager db = new DBManager("University");
        //db.update(id, instruc);
    }

    @DELETE
    @Path("{id}")    
    @Consumes(MediaType.APPLICATION_JSON)
    @Produces(MediaType.APPLICATION_JSON)
    public void delete(@PathParam("id") int id) {       
        DBManager db = new DBManager("University");
        Instructor instructor = db.retrieve(id);
        db.deletePatient(instructor);
    }

}
