/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.company.webservice;

import com.google.gson.Gson;
import ec.edu.espe.company.controller.ControllerStudent;
import ec.edu.espe.company.model.Student;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author ediso
 */
@Path("student")
public class StudentResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of StudentResource
     */
    public StudentResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.espe.company.webservice.StudentResource
     * @return an instance of java.lang.String
     */
    @GET
    @Path("{idStudent}")
    @Produces(MediaType.APPLICATION_JSON)
    public Student getJson(@PathParam("idStudent") int idMovie) {
        //TODO return proper representation object
        Gson gson = new Gson();
       ControllerStudent db = new ControllerStudent();
       
       String instruct=db.search(idMovie);
       Student instructor = gson.fromJson(instruct, Student.class);
        
        
        return instructor;
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public String getJson() {
        //TODO return proper representation object
       Gson gson = new Gson();
       ControllerStudent db = new ControllerStudent();
       
       String instruct=db.read();
        
        
        return instruct;
    }

    /**
     * PUT method for updating or creating an instance of StudentResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
