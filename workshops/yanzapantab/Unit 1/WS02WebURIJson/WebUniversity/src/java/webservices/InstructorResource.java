/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.university.model.Instructor;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;

/**
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
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getInstructor() {
    Instructor instructor = new Instructor();
    
    instructor.setId(1);
    instructor.setName("Sebastian Yanzapanta");
    instructor.setSalary(3000);
    instructor.setTc(true);
    
    return instructor;    
    }
     @GET
     @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getInstructor(@PathParam("id") int id) {
    Instructor instructor = new Instructor();
    
    instructor.setId(id);
    instructor.setName("Sebastian Yanzapanta");
    instructor.setSalary(3000);
    instructor.setTc(true);
    
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
