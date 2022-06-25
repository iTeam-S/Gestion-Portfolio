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
@Entity("formations", { schema: "ITEAMS" })
export class Formations {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("text", { name: "lieu", nullable: true })
  lieu: string | null;

  @Column("varchar", { name: "annee", nullable: true, length: 20 })
  annee: string | null;

  @Column("text", { name: "type", nullable: true })
  type: string | null;

  @Column("text", { name: "description", nullable: true })
  description: string | null;

  @Column("int", { name: "id_membre" })
  idMembre: number;

  @Column("int", { name: "ordre" })
  ordre: number;

  @ManyToOne(() => Membre, (membre) => membre.formations, {
    onDelete: "CASCADE",
    onUpdate: "RESTRICT",
  })
  @JoinColumn([{ name: "id_membre", referencedColumnName: "id" }])
  idMembre2: Membre;
}
