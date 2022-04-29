import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";

@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) { }

    getToken(): string | null {
        return localStorage.getItem('iTeam-$_gp_v2');
    }
}
