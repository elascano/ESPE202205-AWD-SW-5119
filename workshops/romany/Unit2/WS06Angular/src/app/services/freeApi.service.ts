import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";


@Injectable()
export class freeApiService
{
    constructor(private http:HttpClient){}
    //metodo que obtiene los datos de la api
    getComment():Observable<any>{
        return this.http.get("https://jsonplaceholder.typicode.com/posts/1/comments");
    }
}