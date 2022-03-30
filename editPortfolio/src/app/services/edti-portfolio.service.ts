import { HttpClient } from '@angular/common/http';
import { Injectable, OnInit } from '@angular/core'
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Competences, CompetencesAdd, CompetencesUpdate, 
    Experiences, ExperiencesAdd, ExperiencesUpdate, 
    Fonction, FonctionUpdate, 
    Formations, FormationsAdd, FormationsUpdate, 
    Membre, MembreUpdate, PasswordUpdate } from '../models/edit-portfolio.model';


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

    // ***************************** MEMBRE *************************** MEMBRE ****************************
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

    updatePassword(data: PasswordUpdate): Observable<any> {
        const donnees = new FormData();
        donnees.append('lastKeyword', data.lastPassword);
        donnees.append('newKeyword', data.newPassword);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=update/keyword', donnees);
    }

    // ************************** FONCTION ************************* FONCTION *******************************
    getFonction(): Observable<Fonction> {
        return this.http.get<Fonction>('http://localhost:3000/api-iteams/api.php?demande=get/fonction/1');
    }

    updateFonction(data: FonctionUpdate): Observable<any> {
        const donnees = new FormData();
        donnees.append('id_poste', data.id_poste);
        donnees.append('identifiant', data.id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=update/fonction', donnees);
    }

    // *********************** FORMATIONS ************************* FORMATIONS ****************************
    getFormations(): Observable<Formations[]> {
        return this.http.get<Formations[]>('http://localhost:3000/api-iteams/api.php?demande=get/formations/1');
    }

    addFormations(data: FormationsAdd): Observable<any> {
        const donnees = new FormData();
        donnees.append('lieu', data.lieu);
        donnees.append('annee', data.annee);
        donnees.append('type', data.type);
        donnees.append('description', data.description);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=add/formations', donnees)
    }

    updateFormations(data: FormationsUpdate): Observable<any> {
        const donnees = new FormData();
        donnees.append('lieu', data.lieu);
        donnees.append('annee', data.annee);
        donnees.append('type', data.type);
        donnees.append('description', data.description);
        donnees.append('identifiant', data.id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=update/formations', donnees);
    }

    deleteFormations(id: string): Observable<any> {
        const donnees = new FormData();
        donnees.append('identifiant', id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=delete/formations', donnees);
    }

    // ************************ EXPERIENCES *********************** EXPERIENCES *************************
    getExperiences(): Observable<Experiences[]> {
        return this.http.get<Experiences[]>('http://localhost:3000/api-iteams/api.php?demande=get/experiences/1');
    }

    addExperiences(data: ExperiencesAdd): Observable<any> {
        const donnees = new FormData();
        donnees.append('nom', data.nom);
        donnees.append('annee', data.annee);
        donnees.append('type', data.type);
        donnees.append('description', data.description);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=add/experiences', donnees);
    }

    updateExperiences(data: ExperiencesUpdate): Observable<any> {
        const donnees = new FormData();
        donnees.append('nom', data.nom);
        donnees.append('annee', data.annee);
        donnees.append('type', data.type);
        donnees.append('description', data.description);
        donnees.append('identifiant', data.id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=update/experiences', donnees);
    }

    deleteExperiences(id: string): Observable<any> {
        const donnees = new FormData();
        donnees.append('identifiant', id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=delete/experiences', donnees);
    }

    // ********************* COMPETENCES ******************* COMPETENCES **********************
    getCompetences(): Observable<Competences[]> {
        return this.http.get<Competences[]>('http://localhost:3000/api-iteams/api.php?demande=get/competences/1');
    }

    addCompetences(data: CompetencesAdd): Observable<any> {
        const donnees = new FormData();
        donnees.append('nom', data.nom);
        donnees.append('liste', data.liste);
        donnees.append('id_categorie', data.id_categorie);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=add/competences', donnees);
    }

    updateCompetences(data: CompetencesUpdate): Observable<any> {
        const donnees = new FormData();
        donnees.append('nom', data.nom);
        donnees.append('liste', data.liste);
        donnees.append('id_categorie', data.id_categorie);
        donnees.append('identifiant', data.id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=update/competences', donnees);
    }

    deleteCompetences(id: string): Observable<any> {
        const donnees = new FormData();
        donnees.append('identifiant', id);
        return this.http.post<FormData>('http://localhost:3000/api-iteams/api.php?demande=delete/competences', donnees);
    }
}
