/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package WebServices;

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
import static jdk.nashorn.internal.runtime.Debug.id;

/**
 * REST Web Service
 *
 * @author User
 */
@Path("Instructor")
public class InstructorResource_1 {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of InstructorResource_1
     */
    public InstructorResource_1() {
    }

    /**
     * Retrieves representation of an instance of WebServices.InstructorResource_1
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getJson() {
        Instructor instructor = new Instructor();

        instructor.setName("STALIN RIVERA");
        instructor.setSalary(425);
        instructor.setTC(true);
        return instructor;
    }
    /**@GET
    @Path("{Id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getInstructor(@PathParam("Id") int Id{
        Instructor instructor = new Instructor();
        instructor.setId(id);
        instructor.setName("STALIN RIVERA");
        instructor.setSalary(425);
        instructor.setTC(true);
        return instructor;
    }*/
    /**
     * PUT method for updating or creating an instance of InstructorResource_1
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Instructor content) {
    }
}
