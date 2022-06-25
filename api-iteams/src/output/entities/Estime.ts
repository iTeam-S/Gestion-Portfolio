import { Column, Entity, Index, PrimaryGeneratedColumn } from "typeorm";

@Index("fk_membre", ["idMembre"], {})
@Entity("estime", { schema: "ITEAMS" })
export class Estime {
  @PrimaryGeneratedColumn({ type: "int", name: "id" })
  id: number;

  @Column("varchar", { name: "motif", nullable: true, length: 512 })
  motif: string | null;

  @Column("int", { name: "point" })
  point: number;

  @Column("int", { name: "id_membre" })
  idMembre: number;
}
