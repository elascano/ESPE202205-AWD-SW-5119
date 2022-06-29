/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package ec.edu.espe.university.webservices;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;
import ec.edu.espe.university.model.Instructor;

/**
 * REST Web Service
 *
 * @author G401
 */
@Path("Instructor")
public class InstructorResource {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of InstructorResource
     */
    public InstructorResource() {
    }

    /**
     * Retrieves representation of an instance of ec.edu.espe.university.webservices.InstructorResource
     * @return an instance of java.lang.String
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getJson() {
        //TODO return proper representation object
        Instructor instructor= new Instructor();
        instructor.setId(123);
        instructor.setName("Edison Vaca");
        instructor.setSalary(284);
        instructor.setTCP(true);
        
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
