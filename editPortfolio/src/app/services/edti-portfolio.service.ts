import { HttpClient } from '@angular/common/http';
import { Injectable, OnInit } from '@angular/core'
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Membre, MembreUpdate } from '../models/edit-portfolio.model';


@Injectable({
    providedIn: 'root'
})
export class EditPortfolioService implements OnInit { 

    constructor(private http: HttpClient, 
        private router: Router) {}

    ngOnInit(): void {
        if(localStorage.getItem('lahatra-iTeam-$') === null || localStorage.getItem('lahatra-iTeam-$')?.trim() === "") {
            localStorage.removeItem('lahatra-iTeam-$');
            this.router.navigateByUrl('/');
        }
    }
    getMembre(): Observable<Membre> {
        return this.http.get<Membre>('http://localhost:3000/api-iteams/api.php?demande=get/membre/1');
    }

    updateMembre(data: MembreUpdate): Observable<any> {
        const donnees = new FormData();
        donnees.append('user_github', data.user_github);
        donnees.append('tel1', data.tel1);
        donnees.append('tel2', data.tel2);
        donnees.append('mail', data.mail);
        donnees.append('facebook', data.facebook);
        donnees.append('linkedin', data.linkedin);
        donnees.append('cv', data.cv);
        donnees.append('adresse', data.adresse);
        donnees.append('description', data.description);
        donnees.append('fonction', data.fonction);
        donnees.append('pdc', data.pdc);
        donnees.append('dark', data.dark);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=update/membre', donnees);
    }
}
