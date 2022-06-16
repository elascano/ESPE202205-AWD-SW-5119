/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/WebServices/GenericResource.java to edit this template
 */
package webservices;

import ec.edu.espe.university.model.Instructor;
import ec.edu.espe.university.utils.Connection;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.FormParam;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author Fernando
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
     * @return an instance of ec.edu.espe.university.model.Instructor
     */
    // get insformation from a data base mongo db ATLAS 
    // uri de procesamiento 4 procedimiento verificar, calificar, que no sean CRUD
    
    
    @GET 
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getJson() {
        Instructor instructor = new Instructor();
        
        //TODO call to method searche from DB based on the ID
        //instructor = ControllerInstructor.getInstructorById(ID);
        
        instructor.setId(25);
        instructor.setName("Dayse Poma");
        instructor.setSalary(0);
        instructor.setTC(true);
        
        return instructor;
    }
    
    @GET
    @Path("{id}")
    @Produces(MediaType.APPLICATION_JSON)
    public Instructor getInstructor(@PathParam("id") int id) {
        Instructor instructor = new Instructor();
        Connection dataBaseInstructor = new Connection("instructor");
        
        instructor = dataBaseInstructor.getInstructorById(id);
        return instructor;
    }
    
    @POST
    @Path("/insert")
    public Response insertInstructor(@FormParam("id") int id,
		@FormParam("name") String name,
		@FormParam("salary") float price,
                @FormParam("TC") boolean TC) {
        
        Instructor instructor = new Instructor(id, name, price, TC);
        Connection dataBaseInstructor = new Connection("instructor");
        dataBaseInstructor.insertInstructor(instructor);
        
        return Response.status(200)
                .entity("Instructor guardado correctamente!")
                .build();
    }
    
    @GET
    @Path("list_instructors")
    @Produces({ MediaType.TEXT_HTML })
    public Response helloWorld() {
            try {
                    return Response.ok("<b><i><u>Hello World</u></i></b>").build();
            } catch (Exception e) {
                    return Response.status(Response.Status.BAD_REQUEST).build();
            }
    }
    
    
    /**
     * PUT method for updating or creating an instance of InstructorResource
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(Instructor content) {
    }
}
