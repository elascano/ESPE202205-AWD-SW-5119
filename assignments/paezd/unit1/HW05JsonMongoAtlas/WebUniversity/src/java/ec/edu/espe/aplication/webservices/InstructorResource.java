/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.edu.espe.aplication.webservices;

import ec.edu.espe.aplication.model.Instructor;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author USUARIO
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
     * Retrieves representation of an instance of ec.edu.espe.aplication.webservices.InstructorResource
     * @return an instance of ec.edu.espe.aplication.model.Instructor
     */
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public Instructor getText() {
         //TODO return proper representation object
        Instructor instructor= new Instructor();
        instructor.setId(123);
        instructor.setName("Diego Paez");
        instructor.setSalary(284);
        instructor.setTC(true);
        
        return instructor;
    }

    /**
     * PUT method for updating or creating an instance of InstructorResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.TEXT_PLAIN)
    public void putText(Instructor content) {
    }
}
