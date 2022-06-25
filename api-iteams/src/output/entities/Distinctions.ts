import { Column, Entity, Index, PrimaryGeneratedColumn } from "typeorm";

@Index("FK_distinction_membre", ["idMembre"], {})
@Entity("distinctions", { schema: "ITEAMS" })
export class Distinctions {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("text", { name: "organisateur", nullable: true })
  organisateur: string | null;

  @Column("varchar", { name: "annee", nullable: true, length: 50 })
  annee: string | null;

  @Column("varchar", { name: "type", nullable: true, length: 255 })
  type: string | null;

  @Column("text", { name: "description", nullable: true })
  description: string | null;

  @Column("int", { name: "id_membre" })
  idMembre: number;

  @Column("int", { name: "ordre" })
  ordre: number;
}
