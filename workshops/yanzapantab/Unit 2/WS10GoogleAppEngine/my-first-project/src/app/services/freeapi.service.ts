//Controlador
import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";

//injecta relaciones de dependencia a las clases
@Injectable()
export class freeApiServvice
{
    constructor(private http: HttpClient){}
    getComments():Observable<any>{
        return this.http.get("https://jsonplaceholder.typicode.com/posts/1/comments");
    }
}