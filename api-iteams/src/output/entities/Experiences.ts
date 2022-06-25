import {
  Column,
  Entity,
  Index,
  JoinColumn,
  ManyToOne,
  PrimaryGeneratedColumn,
} from "typeorm";
import { Membre } from "./Membre";

@Index("id_membre", ["idMembre"], {})
@Entity("experiences", { schema: "ITEAMS" })
export class Experiences {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("text", { name: "nom", nullable: true })
  nom: string | null;

  @Column("varchar", { name: "annee", nullable: true, length: 50 })
  annee: string | null;

  @Column("text", { name: "type", nullable: true })
  type: string | null;

  @Column("text", { name: "description", nullable: true })
  description: string | null;

  @Column("int", { name: "id_membre" })
  idMembre: number;

  @Column("int", { name: "ordre" })
  ordre: number;

  @ManyToOne(() => Membre, (membre) => membre.experiences, {
    onDelete: "CASCADE",
    onUpdate: "RESTRICT",
  })
  @JoinColumn([{ name: "id_membre", referencedColumnName: "id" }])
  idMembre2: Membre;
}
