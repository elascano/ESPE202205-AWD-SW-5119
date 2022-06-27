import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from "@angular/common/http";
@Injectable()
export class freeApiService
{
    constructor(private http: HttpClient) { }
        getcomments(): Observable<any>{
            return this.http.get("http://localhost:5000/smartWatch");
       
        }
    
}