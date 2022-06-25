import {
  Column,
  Entity,
  Index,
  JoinColumn,
  ManyToOne,
  PrimaryGeneratedColumn,
} from "typeorm";
import { Membre } from "./Membre";

@Index("FK_competences_membre", ["idMembre"], {})
@Index("FK_competences_categorie_competence", ["idCategorie"], {})
@Entity("competences", { schema: "ITEAMS" })
export class Competences {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "nom", length: 100 })
  nom: string;

  @Column("text", { name: "liste" })
  liste: string;

  @Column("int", { name: "id_categorie" })
  idCategorie: number;

  @Column("int", { name: "id_membre" })
  idMembre: number;

  @Column("int", { name: "ordre" })
  ordre: number;

  @ManyToOne(() => Membre, (membre) => membre.competences, {
    onDelete: "CASCADE",
    onUpdate: "RESTRICT",
  })
  @JoinColumn([{ name: "id_membre", referencedColumnName: "id" }])
  idMembre2: Membre;
}
